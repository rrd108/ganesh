<?php
/**
 * @var \App\View\AppView $this
 */
?>
<nav class="small-3 medium-2 large-2 columns" id="actions-sidebar">
    <ul class="menu vertical">
        <li class="menu-text"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Activity'), ['action' => 'edit', $activity->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Activity'), ['action' => 'delete', $activity->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $activity->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Activities'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Activity'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Festivals'), ['controller' => 'Festivals', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Festival'), ['controller' => 'Festivals', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Departments'), ['controller' => 'Departments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Department'), ['controller' => 'Departments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="activities view small-9 medium-10 large-10 columns content">
    <h3><?= h($activity->name) ?></h3>
    <div class="row">
        <table class="vertical-table small-12 medium-12 large-6 vertical-table small-12 medium-12 large-6 columns">
            <tr>
                <th scope="row"><?= __('Festival') ?></th>
                <td><?= $activity->has('festival') ? $this->Html->link($activity->festival->name,
                        ['controller' => 'Festivals', 'action' => 'view', $activity->festival->id]) : '' ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Department') ?></th>
                <td><?= $activity->has('department') ? $this->Html->link($activity->department->name,
                        ['controller' => 'Departments', 'action' => 'view', $activity->department->id]) : '' ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Name') ?></th>
                <td><?= h($activity->name) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Id') ?></th>
                <td><?= $this->Number->format($activity->id) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Manpower') ?></th>
                <td><?= $this->Number->format($activity->manpower) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Start') ?></th>
                <td><?= h($activity->start) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('End') ?></th>
                <td><?= h($activity->end) ?></td>
            </tr>
        </table>
        <div class="colums large-offset-1"></div>
        <table class="vertical-table small-12 medium-12 large-5 columns">
            <tr>
                <th colspan="2"><?= __('Legend') ?></th>
            </tr>
            <tr>
                <td><?= __('People apply') ?></td>
                <td class="no-pad"><span class="label success full"></span></td>
            </tr>
            <tr>
                <td><?= __('Too lot person') ?></td>
                <td class="no-pad"><span class="label primary full"></span></td>
            </tr>
            <tr>
                <td><?= __('Enough person') ?></td>
                <td class="no-pad"><span class="label success full"></span></td>
            </tr>
            <tr>
                <td><?= __('Few person') ?></td>
                <td class="no-pad"><span class="label few-person full"></span></td>
            </tr>
            <tr>
                <td><?= __('No person') ?></td>
                <td class="no-pad"><span class="label alert full"></span></td>
            </tr>
        </table>
    </div>
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($activity->activities_users)): ?>
            <table class="no-pad">
                <tr>
                    <th scope="col"><?= __('Username') ?></th>
                    <?php foreach ($activity->listHours() as $hour):
                        $nextHour = date('H:i', strtotime($hour) + 3600);
                        ?>
                        <th scope="col"><?= $hour . '-' . $nextHour ?></th>
                    <?php endforeach; ?>
                </tr>
                <?php
                $hourCount = [];
                foreach ($activity->listHours() as $hour) {
                    $hourCount[$hour] = 0;
                }
                foreach ($activity->activities_users as $activityUser): ?>
                    <tr>
                        <td><?= h($activityUser->user->username) ?></td>
                        <?php foreach ($activity->listHours() as $hour): ?>
                            <td>
                                <?php $hourHasUser = $activityUser->start->format('H:i') <= $hour
                                    && $activityUser->end->format('H:i') > $hour;
                                if ($hourHasUser) {
                                    $hourCount[$hour]++;
                                }
                                ?>
                                <span class="
                                <?= ($hourHasUser)
                                    ? 'label success'
                                    : '' ?> full">
                                </span>
                            </td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td><b><?= __('Summary') ?></b></td>
                    <?php
                    foreach ($activity->listHours() as $hour): ?>
                        <td>
                            <span class="
                                <?= ($hourCount[$hour] > $activity->manpower) ? 'label primary ' : '' ?>
                                <?= ($hourFull = $hourCount[$hour] == $activity->manpower) ? 'label success' : '' ?>
                                <?= ($hourCount[$hour] < $activity->manpower && $hourCount[$hour] != 0)
                                    ? 'label few-person ' : '' ?>
                                <?= ($hourWithoutPerson = $hourCount[$hour] == 0) ? 'label alert ' : '' ?>
                                full">
                            </span>
                        </td>
                    <?php endforeach; ?>
                </tr>
            </table>
        <?php endif; ?>
    </div>
</div>
