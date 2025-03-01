<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ActivityModel;
use App\Models\GalleryModel;
use App\Models\AnnouncementModel;

class Dashboard extends BaseController
{
    protected $userModel;
    protected $activityModel;
    protected $galleryModel;
    protected $announcementModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->activityModel = new ActivityModel();
        $this->galleryModel = new GalleryModel();
        $this->announcementModel = new AnnouncementModel();
    }

    public function index()
    {
        $currentMonth = date('Y-m');
        
        $data = [
            'title' => 'Dashboard | Kelompok Tani Maju',
            'totalMembers' => $this->userModel->where('role !=', 'admin')->countAllResults(),
            'totalActivities' => $this->activityModel->where('DATE_FORMAT(date, "%Y-%m") =', $currentMonth)->countAllResults(),
            'totalGalleries' => $this->galleryModel->countAllResults(),
            'recentActivities' => $this->activityModel->where('date >=', date('Y-m-d'))
                                                    ->orderBy('date', 'ASC')
                                                    ->limit(5)
                                                    ->find(),
            'recentAnnouncements' => $this->announcementModel->where('status', 'active')
                                                           ->orderBy('created_at', 'DESC')
                                                           ->limit(5)
                                                           ->find(),
            'recentGalleries' => $this->galleryModel->orderBy('created_at', 'DESC')
                                                   ->limit(4)
                                                   ->find(),
            'user' => $this->userModel->find(session()->get('user_id'))
        ];

        return view('dashboard/index', $data);
    }

    public function profile()
    {
        if (!session()->get('user_id')) {
            return redirect()->to('/auth/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $userId = session()->get('user_id');
        $user = $this->userModel->find($userId);

        if (!$user) {
            return redirect()->to('/auth/login')->with('error', 'User tidak ditemukan.');
        }

        // Hitung statistik pengguna
        $userStats = [
            'totalActivities' => $this->activityModel->where('user_id', $userId)->countAllResults(),
            'totalGalleries' => $this->galleryModel->where('user_id', $userId)->countAllResults(),
            'totalAnnouncements' => $this->announcementModel->where('user_id', $userId)->countAllResults(),
            'lastActivity' => $this->activityModel->where('user_id', $userId)
                                               ->orderBy('date', 'DESC')
                                               ->first()
        ];

        $data = [
            'title' => 'Profil | Kelompok Tani Maju',
            'user' => $user,
            'stats' => $userStats
        ];

        return view('dashboard/profile', $data);
    }

    public function activities()
    {
        if (!session()->get('user_id')) {
            return redirect()->to('/auth/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $currentPage = $this->request->getVar('page') ?? 1;
        $perPage = 10;

        $activities = $this->activityModel
            ->select('activities.*, users.name as created_by')
            ->join('users', 'users.id = activities.user_id')
            ->where('activities.deleted_at IS NULL')
            ->orderBy('activities.date', 'DESC')
            ->paginate($perPage, 'activities');

        $data = [
            'title' => 'Kegiatan | Kelompok Tani Maju',
            'activities' => $activities,
            'pager' => $this->activityModel->pager,
            'currentPage' => $currentPage,
            'user' => $this->userModel->find(session()->get('user_id'))
        ];

        return view('dashboard/activities', $data);
    }

    public function gallery()
    {
        if (!session()->get('user_id')) {
            return redirect()->to('/auth/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $currentPage = $this->request->getVar('page') ?? 1;
        $perPage = 12;

        $galleries = $this->galleryModel
            ->select('galleries.*, users.name as uploaded_by')
            ->join('users', 'users.id = galleries.user_id')
            ->where('galleries.deleted_at IS NULL')
            ->orderBy('galleries.created_at', 'DESC')
            ->paginate($perPage, 'galleries');

        $data = [
            'title' => 'Galeri | Kelompok Tani Maju',
            'galleries' => $galleries,
            'pager' => $this->galleryModel->pager,
            'currentPage' => $currentPage,
            'user' => $this->userModel->find(session()->get('user_id'))
        ];
        helper('form');
        return view('dashboard/gallery', $data);
    }

    public function uploadMedia()
    {
        if (!session()->get('user_id')) {
            return redirect()->to('/auth/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $rules = [
            'title' => 'required|min_length[3]',
            'media' => 'uploaded[media]|is_image[media]|max_size[media,2048]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                           ->withInput()
                           ->with('errors', $this->validator->getErrors());
        }

        $media = $this->request->getFile('media');
        $fileName = $media->getRandomName();

        $media->move(ROOTPATH . 'public/uploads/gallery', $fileName);

        $data = [
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'file_name' => $fileName,
            'file_type' => $media->getClientMimeType(),
            'user_id' => session()->get('user_id')
        ];

        $this->galleryModel->insert($data);

        return redirect()->to('/dashboard/gallery')
                        ->with('success', 'Media berhasil diunggah');
    }

    public function deleteMedia($id = null)
    {
        if (!session()->get('user_id') || session()->get('role') !== 'admin') {
            return redirect()->to('/dashboard/gallery')
                           ->with('error', 'Anda tidak memiliki akses untuk menghapus media.');
        }

        if ($id === null) {
            return redirect()->to('/dashboard/gallery')
                           ->with('error', 'ID media tidak valid.');
        }

        $gallery = $this->galleryModel->find($id);
        
        if (!$gallery) {
            return redirect()->to('/dashboard/gallery')
                           ->with('error', 'Media tidak ditemukan.');
        }

        try {
            // Hapus file fisik
            $filePath = ROOTPATH . 'public/uploads/gallery/' . $gallery['file_name'];
            if (file_exists($filePath)) {
                unlink($filePath);
            }

            // Soft delete dari database
            if (!$this->galleryModel->delete($id)) {
                throw new \Exception('Gagal menghapus data dari database.');
            }

            return redirect()->to('/dashboard/gallery')
                           ->with('success', 'Media berhasil dihapus.');
        } catch (\Exception $e) {
            log_message('error', '[Gallery Delete] ' . $e->getMessage());
            return redirect()->to('/dashboard/gallery')
                           ->with('error', 'Terjadi kesalahan saat menghapus media.');
        }
    }

    public function updateProfile()
    {
        if (!session()->get('user_id')) {
            return redirect()->to('/auth/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $userId = session()->get('user_id');
        $rules = [
            'name' => 'required',
            'phone' => 'required|min_length[10]|max_length[15]',
            'address' => 'required'
        ];

        // Jika password diisi, tambahkan validasi password
        if ($this->request->getPost('password')) {
            $rules['password'] = 'required|min_length[6]';
            $rules['confirm_password'] = 'required|matches[password]';
        }

        if (!$this->validate($rules)) {
            return redirect()->back()
                           ->withInput()
                           ->with('errors', $this->validator->getErrors());
        }

        $data = [
            'name' => $this->request->getPost('name'),
            'phone' => $this->request->getPost('phone'),
            'address' => $this->request->getPost('address')
        ];

        // Update password jika diisi
        if ($this->request->getPost('password')) {
            $data['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        }

        $this->userModel->update($userId, $data);

        return redirect()->to('/dashboard/profile')
                        ->with('success', 'Profil berhasil diperbarui');
    }

    public function members()
    {
        $data = [
            'title' => 'Anggota - Kelompok Tani Maju'
        ];
        
        return view('dashboard/members', $data);
    }
}
