<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="users form">
                <?= $this->Flash->render() ?>
                <?= $this->Form->create() ?>
                <h3>
                    <?= __('Please enter your username and password') ?>
                </h3>

                <div class="form-group"><?= $this->Form->control('username', ['class'=>'form-control']) ?></div>
                <div class="form-group"><?= $this->Form->control('password', ['class'=>'form-control']) ?></div>
                <div class="form-group"><?= $this->Form->button(__('Login'), ['class'=>'btn btn-success']); ?></div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>