<button type="button" class="d-none" id="confirmActionBtn" data-toggle="modal" data-target=".bd-example-modal-sm"></button>
<div class="modal fade bd-example-modal-sm" data-backdrop="static" role="dialog" data-keyboard="false" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm border-0">
    <div class="modal-content bg-<?= $state?>">
      <div class="modal-header text-light bg-<?= $state?>">
        <h5 class="modal-title" id="staticBackdropLabel">
          Confirm Action
        </h5>
        <a href="<?= site_url()?>users" role="button" class="close">
          <span aria-hidden="true">&times;</span>
        </a>
      </div>
      <div class="modal-body rounded-bottom alert-<?= $state?>">
        <?= form_open('users/'.$action) ?>
        <?= csrf_field() ?>
        <?= form_hidden('a', esc($alumni_id)) ?>

        <?php if($action != 'delete'): ?>          
          <?= form_hidden('e', esc($email)) ?>
        <?php endif ?>

        Are you sure that you want to <?= $action ?> this User?
        <div class="d-flex justify-content-center mt-4">
          <a href="<?= site_url()?>users" role="button" class="btn btn-secondary mr-3">Cancel</a>
          <button type="submit" class="btn btn-primary">Confirm</button>
        </div>
        <?= form_close() ?>
      </div>
    </div>
  </div>
</div>

<!-- show modal -->
<script>
  document.addEventListener("DOMContentLoaded", ()=> {
    showModal('confirmActionBtn');
  });
</script>