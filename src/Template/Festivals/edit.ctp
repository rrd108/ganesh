<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="small-3 medium-2 large-2 columns" id="actions-sidebar">
    <ul class="menu vertical">
        <li class="menu-text"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $festival->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $festival->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Festivals'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Places'), ['controller' => 'Places', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Place'), ['controller' => 'Places', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Activities'), ['controller' => 'Activities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Activity'), ['controller' => 'Activities', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="festivals form small-9 medium-10 large-10 columns content">
    <?= $this->Form->create($festival) ?>
    <fieldset>
        <legend><?= __('Edit Festival') ?></legend>
        <?php
            echo $this->Form->control('place_id', ['options' => $places]);
            echo $this->Form->control('name');
            ?>
            <?= $this->Form->label('Festivals.start', __('Start date & time')); ?>
        <?= $this->Form->dateTime('start', [
            'minYear' => date('Y')-2,
            'maxYear' => date('Y')+2,
            'monthNames' => true,
            'orderYear' => 'asc',
            'empty' => [
                'year' => __('Choose year...'),
                'month' => __('Choose month...'),
                'day' => __('Choose day...'),
                'hour' => __('Choose hour...'),
                'minute' => __('Choose minute...')
            ],
            'year' => [
                'class' => 'columns medium-3'
            ],
            'month' => [
                'class' => 'columns medium-5 date-form'
            ],
            'day' => [
                'class' => 'columns medium-3 date-form'
            ],
            'hour' => [
                'class' => 'columns medium-3'
            ],
            'minute' => [
                'class' => 'columns medium-3 date-form'
            ]

        ]); ?>
        <?= $this->Form->label('Festivals.end', __('End date & time')); ?>
        <?= $this->Form->dateTime('end', [
            'minYear' => date('Y')-2,
            'maxYear' => date('Y')+2,
            'monthNames' => true,
            'orderYear' => 'asc',
            'empty' => [
                'year' => __('Choose year...'),
                'month' => __('Choose month...'),
                'day' => __('Choose day...'),
                'hour' => __('Choose hour...'),
                'minute' => __('Choose minute...')
            ],
            'year' => [
                'class' => 'columns medium-3'
            ],
            'month' => [
                'class' => 'columns medium-5 date-form'
            ],
            'day' => [
                'class' => 'columns medium-3 date-form'
            ],
            'hour' => [
                'class' => 'columns medium-3'
            ],
            'minute' => [
                'class' => 'columns medium-3 date-form'
            ]

        ]); ?>

    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'button']) ?>
    <?= $this->Form->end() ?>
</div>
