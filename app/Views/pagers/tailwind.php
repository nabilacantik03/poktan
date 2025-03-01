<?php

use CodeIgniter\Pager\PagerRenderer;

/**
 * @var PagerRenderer $pager
 */
$pager->setSurroundCount(2);
?>

<nav role="navigation" aria-label="<?= lang('Pager.pageNavigation') ?>" class="flex items-center justify-between">
    <div class="flex-1 flex items-center justify-between">
        <div>
            <?php if ($pager->hasPages()): ?>
            <ul class="flex items-center gap-2">
                <?php if ($pager->hasPrevious()) : ?>
                <li>
                    <a href="<?= $pager->getFirst() ?>" 
                       class="px-3 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">
                        <?= lang('Pager.first') ?>
                    </a>
                </li>
                <li>
                    <a href="<?= $pager->getPrevious() ?>" 
                       class="px-3 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">
                        <?= lang('Pager.previous') ?>
                    </a>
                </li>
                <?php endif ?>

                <?php foreach ($pager->links() as $link) : ?>
                <li>
                    <a href="<?= $link['uri'] ?>" 
                       class="px-3 py-2 text-sm font-medium <?= $link['active'] ? 'text-green-600 bg-green-50 border border-green-500' : 'text-gray-500 bg-white border border-gray-300 hover:bg-gray-50' ?> rounded-lg">
                        <?= $link['title'] ?>
                    </a>
                </li>
                <?php endforeach ?>

                <?php if ($pager->hasNext()) : ?>
                <li>
                    <a href="<?= $pager->getNext() ?>" 
                       class="px-3 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">
                        <?= lang('Pager.next') ?>
                    </a>
                </li>
                <li>
                    <a href="<?= $pager->getLast() ?>" 
                       class="px-3 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">
                        <?= lang('Pager.last') ?>
                    </a>
                </li>
                <?php endif ?>
            </ul>
            <?php endif ?>
        </div>
    </div>
</nav>
