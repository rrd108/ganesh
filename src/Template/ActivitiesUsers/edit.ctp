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
                ['action' => 'delete', $activitiesUser->user_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $activitiesUser->user_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Activities Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Activities'), ['controller' => 'Activities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Activity'), ['controller' => 'Activities', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="activitiesUsers form small-9 medium-10 large-10 columns content">
    <?= $this->Form->create($activitiesUser) ?>
    <fieldset>
        <legend><?= __('Edit Activities User') ?></legend>
        <?php
            echo $this->Form->control('id');
            echo $this->Form->control('activity_id', ['options' => $activities]);
            echo $this->Form->control('start', ['empty' => true]);
            echo $this->Form->control('end', ['empty' => true]);
            echo $this->Form->control('fulltime');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'button']) ?>
    <?= $this->Form->end() ?>
</div>
