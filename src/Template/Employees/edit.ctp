<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee $employee
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $employee->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $employee->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Employees'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="employees form large-9 medium-8 columns content">
    <?= $this->Form->create($employee, array('enctype' => 'multipart/form-data')); ?>
    <fieldset>
        <legend><?= __('Edit Employee') ?></legend>
        <?php
            echo $this->Form->control('name',array('required' => 'true'));
            echo $this->Form->control('email',array('type' => 'email','required' => 'true'));
            echo $this->Form->control('phone_number',array('type' => 'number'));

            echo $this->Form->control('photo',array('type' => 'file','enctype'=>'multipart/form-data', 'accept'=>"image/jpg, image/jpeg, image/png"));
            echo $this->Html->image('uploads/employees/' . $employee->photo); 
            echo $this->Form->control('birth_date');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
