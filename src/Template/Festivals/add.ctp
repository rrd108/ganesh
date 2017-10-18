<?php
/**
 * @var \App\View\AppView $this
 */
?>
<nav class="small-3 medium-3 large-3 columns" id="actions-sidebar">
    <ul class="menu vertical">
        <li class="menu-text"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Festivals'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Places'), ['controller' => 'Places', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Place'), ['controller' => 'Places', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Activities'), ['controller' => 'Activities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Activity'), ['controller' => 'Activities', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="festivals form small-9 medium-9 large-9 columns content">
    <?= $this->Form->create($festival) ?>
    <fieldset>
        <legend><?= __('Add Festival') ?></legend>
        <?php
        echo $this->Form->control('place_id', ['options' => $places]);
        echo $this->Form->control('name');
        ?>
        <?= $this->Form->label('Festivals.start', 'Start date & time'); ?>
        <?= $this->Form->dateTime('start', [
            'minYear' => 2017,
            'maxYear' => 2020,
            'monthNames' => false,
            'orderYear' => 'asc',
            'empty' => [
                'year' => 'Choose year...',
                'month' => 'Choose month...',
                'day' => 'Choose day...',
                'hour' => 'Choose hour...',
                'minute' => 'Choose minute...'
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
        <?= $this->Form->label('Festivals.end', 'End date & time'); ?>
        <?= $this->Form->dateTime('end', [
            'minYear' => 2017,
            'maxYear' => 2020,
            'monthNames' => false,
            'orderYear' => 'asc',
            'empty' => [
                'year' => 'Choose year...',
                'month' => 'Choose month...',
                'day' => 'Choose day...',
                'hour' => 'Choose hour...',
                'minute' => 'Choose minute...'
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
