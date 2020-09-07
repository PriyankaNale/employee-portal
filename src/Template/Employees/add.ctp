<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee $employee
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Employees'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="employees form large-9 medium-8 columns content">
    <?= $this->Form->create($employee,array('enctype' => 'multipart/form-data')); ?>
    <fieldset>
        <legend><?= __('Add Employee') ?></legend>
        <?php
            echo $this->Form->control('name',array('required' => 'true'));
            echo $this->Form->control('email',array('required' => 'true'));
            echo $this->Form->control('phone_number');
            echo $this->Form->control('photo',array('type' => 'file','enctype'=>'multipart/form-data','accept'=>"image/gif, image/jpeg, image/png"));
            echo $this->Form->control('birth_date');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
