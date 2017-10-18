<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="small-3 medium-2 large-2 columns" id="actions-sidebar">
    <ul class="menu vertical">
        <li class="menu-text"><?= __('Actions') ?></li>
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
        <legend><?= __('Add Festival') ?></legend>
        <?php
            echo $this->Form->control('place_id', ['options' => $places]);
            echo $this->Form->control('name');
        ?>
        <label>Start</label>
        <div class="row">
            <div class="colums date-from medium-2">
                <small>Year</small>
                <select id="strat[year]" name="start[year]">
                    <?php for ($year = 2017; $year<2023; $year++){ ?>
                    <option><?= h($year) ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="colums date-from medium-2">
                <small>Month</small>
                <select id="strat[month]" name="start[month]">
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
            </div>
            <div class="colums date-from medium-2">
                <small>Day</small>
                <select id="strat[day]" name="start[day]">
                    <?php for ($day = 1; $day<=31; $day++){ ?>
                        <option><?= h($day) ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="colums date-from medium-2">
                <small>Hour</small>
                <select id="strat[hour]" name="start[hour]">
                    <?php for ($hour = 0; $hour<24; $hour++){ ?>
                        <option><?= h($hour) ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="colums date-from medium-2">
                <small>Minute</small>
                <select id="strat[hour]" name="start[hour]">
                    <?php for ($minute = 0; $minute<60; $minute++){ ?>
                        <option><?= h($minute) ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <label>End</label>
        <div class="row">
            <div class="colums date-from medium-2">
                <small>Year</small>
                <select id="end[year]" name="end[year]">
                    <option>2017</option>
                    <option>2018</option>
                </select>
            </div>
            <div class="colums date-from medium-2">
                <small>Month</small>
                <select id="end[month]" name="end[month]">
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
            </div>
            <div class="colums date-from medium-2">
                <small>Day</small>
                <select id="end[day]" name="end[day]">
                    <option>01</option>
                    <option>02</option>
                </select>
            </div>
            <div class="colums date-from medium-2">
                <small>Hour</small>
                <select id="end[hour]" name="end[hour]">
                    <option>01</option>
                    <option>02</option>
                </select>
            </div>
            <div class="colums date-from medium-2">
                <small>Minute</small>
                <select id="end[minute]" name="end[minute]">
                    <option>01</option>
                    <option>02</option>
                </select>
            </div>
        </div>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'button']) ?>
    <?= $this->Form->end() ?>
</div>
