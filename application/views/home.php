<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<ul class="">
    <?php if($tasks): ?>
    <?php foreach($tasks as $task): ?>
        <li class=" d-flex justify-content-between align-items-center text-secondary">
            <?php if(!$task->is_deleted): ?>
            <span class="">
                <i class="fa fa-circle-o"></i>&nbsp;
                <?= $task->t_name ?>
            </span>
            <?= form_open('home/delete', 'id="form-'.$task->id.'"') ?>
            <?= form_hidden('id', $task->id) ?>
            <a href="javascript:;" onclick="checkPrompt('form-<?= $task->id ?>')"><i class="fa fa-trash fa-lg"></i></a>
            <?= form_close() ?>
            <?php else: ?>
                <span class="">
                <i class="fa fa-circle"></i>&nbsp;
                <?= "<del>$task->t_name</del>" ?>
                <?php
                $start = new DateTime($task->start_time);
                $end = new DateTime($task->end_time);

                $diff = $end->diff($start);
                echo '<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                echo $diff->h, " Hours, ";
                echo $diff->i, " Minutes, ";
                echo $diff->s, " Seconds";
            ?>
            </span>
            <?php endif ?>
        </li>
    <?php endforeach ?>
    <?php else: ?>
    <li class=" d-flex align-items-center">
        <span>
            No tasks found.
        </span>
    </li>    
    <?php endif ?>
</ul>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary task-btn" data-bs-toggle="modal" data-bs-target="#taskModal">
  <i class="fa fa-plus"></i>&nbsp;&nbsp;New task
</button>
<!-- Modal -->
<div class="modal fade" id="taskModal" tabindex="-1" aria-labelledby="taskModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="taskModalLabel">Add New task</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?= form_open('home/add-task', 'id="task-form"') ?>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <?= form_label('Task', 't_name', 'class="col-form-label pt-0"') ?>
                        <?= form_input([
                            'class' => "form-control",
                            'id' => "t_name",
                            'name' => "t_name",
                            'maxlength' => 100,
                            'required' => ""
                        ]); ?>
                    </div>
                </div>
                <div class="text-danger" id="error_msg"></div>
            </div>
        <?= form_close() ?>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="submitForm('task-form')" class="btn btn-primary add-btn">Add task</button>
      </div>
    </div>
  </div>
</div>