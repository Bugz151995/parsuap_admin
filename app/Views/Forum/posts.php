<!-- MAIN CONTENT CONTAINER -->
<div class="app-main__outer">
  <div class="app-main__inner">
    <div class="app-page-title">
      <div class="page-title-wrapper">
        <div class="page-title-heading">
          <div class="page-title-icon">
            <i class="pe-7s-comment icon-gradient bg-mean-fruit">
            </i>
          </div>
          <div>Forum
            <div class="page-title-subheading">Welcome to the Forum page, here you can see the summary of the users, and other system functionalities.
            </div>
          </div>
        </div>
        <div class="page-title-actions">
          <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark">
            <i class="fa fa-star"></i>
          </button>
          <div class="d-inline-block dropdown">
            <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
              <span class="btn-icon-wrapper pr-2 opacity-7">
                <i class="fa fa-business-time fa-w-20"></i>
              </span>
              Buttons
            </button>
            <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
              <ul class="nav flex-column">
                <li class="nav-item">
                  <a href="javascript:void(0);" class="nav-link">
                    <i class="nav-link-icon lnr-inbox"></i>
                    <span>
                      Inbox
                    </span>
                    <div class="ml-auto badge badge-pill badge-secondary">86</div>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="javascript:void(0);" class="nav-link">
                    <i class="nav-link-icon lnr-book"></i>
                    <span>
                      Book
                    </span>
                    <div class="ml-auto badge badge-pill badge-danger">5</div>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="javascript:void(0);" class="nav-link">
                    <i class="nav-link-icon lnr-picture"></i>
                    <span>
                      Picture
                    </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a disabled href="javascript:void(0);" class="nav-link disabled">
                    <i class="nav-link-icon lnr-file-empty"></i>
                    <span>
                      File Disabled
                    </span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- PAGINATION -->
    <div class="row justify-content-between">
      <div class="col-auto">
        <?= $pager->links() ?>
      </div>
      <div class="col-auto pb-3">
        <div class="d-flex">
          <a href="<?= site_url() ?>threads" class="btn pb-0 btn-focus rounded-pill px-3 mr-3">
            <span class="align-middle">
              <i class="fa fa-fw" aria-hidden="true"></i>
              Refresh List
            </span>
          </a>
          <?= form_open('threads/s') ?>
          <?= csrf_field() ?>
          <div class="input-group rounded-pill bg-white shadow-sm">
            <input placeholder="Search Title..." name="s" type="text" class="form-control rounded-pill border-0 px-4">
            <span class="input-group-text rounded-pill border-0 bg-primary">
              <button type="submit" class="btn p-0 text-light">
                <i class="fas fa-search"></i>
              </button>
            </span>
          </div>
          <?= form_close() ?>
        </div>
      </div>
    </div>

    <!-- TABLE -->
    <div class="row">
      <div class="col-md-12">
        <div class="main-card mb-3 card">
          <div class="card-header">FORUM POSTS
            <div class="btn-actions-pane-right">
              <i class="pe-7s-star mr-3"> </i><?= $thread['topic'] ?>
            </div>
          </div>
          <div class="table-responsive">
            <table class="align-middle mb-0 table table-borderless table-striped table-hover">
              <thead>
                <tr>
                  <th class="text-center">#</th>
                  <th>Post Code</th>
                  <th class="text-center">Post</th>
                  <th class="text-center">Posted @</th>
                  <th class="text-center">Upvotes</th>
                  <th class="text-center">Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php if (count($posts) > 0) : ?>
                  <?php foreach ($posts as $key => $p) : ?>
                    <tr data-toggle="tooltip" data-placement="right" title="<?= $p['post']?>">
                      <td class="text-center text-muted">#<?= $p['forum_post_id'] ?></td>

                      <td>
                        <div class="widget-content p-0">
                          <div class="widget-content-wrapper">
                            <div class="widget-content-left flex2">
                              <div class="widget-heading"><?= $p['post_code'] ?></div>
                              <div class="widget-subheading opacity-7">By: <?= $p['fname'] . ' ' . $p['lname'] ?></div>
                            </div>
                          </div>
                        </div>
                      </td>

                      <td class="text-center">
                        <span class="d-inline-block text-truncate" style="max-width: 300px;">
                          <?= $p['post'] ?>
                        </span>
                      </td>

                      <td class="text-center">
                        <?= $p['posted_at'] ?>
                      </td>

                      <td class="text-center">
                        <?= $p['upvotes'] ?>
                      </td>

                      <td class="text-center">
                        <div class="dropup btn-group">
                          <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" class="dropdown-toggle-split dropdown-toggle btn btn-sm btn-primary"><span class="sr-only">Toggle Dropdown</span></button>
                          <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu p-0">
                            <?= form_open('threads/v/edit', ['class' => 'dropdown-item p-0']) ?>
                            <?= csrf_field() ?>
                            <?= form_hidden('p', esc($p['forum_post_id'])) ?>
                            <button type="submit" tabindex="0" class="btn-transition btn w-100 btn-outline-primary rounded-0 border-0">
                              <i class="pe-7s-note mr-2"></i> Edit
                            </button>
                            <?= form_close() ?>

                            <?= form_open('threads/v/delete', ['class' => 'dropdown-item p-0']) ?>
                            <?= csrf_field() ?>
                            <?= form_hidden('p', esc($p['forum_post_id'])) ?>
                            <?= form_hidden('action', 'delete') ?>
                            <button type="submit" tabindex="0" class="btn-transition btn w-100 btn-outline-danger rounded-0 border-0">
                              <i class="pe-7s-trash mr-2"></i> Delete
                            </button>
                            <?= form_close() ?>
                          </div>
                        </div>
                      </td>
                    </tr>
                  <?php endforeach ?>
                <?php else : ?>
                  <tr>
                    <td colspan="7" class="pt-4 px-5">
                      <div class="alert alert-danger"><strong><i class="fas fa-exclamation-triangle mr-2"></i>Oops!</strong> There are no User Found.</div>
                    </td>
                  </tr>
                <?php endif ?>
              </tbody>
            </table>
          </div>
          <div class="d-block text-center card-footer">
            <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger"><i class="pe-7s-trash btn-icon-wrapper"> </i></button>
            <button class="btn-wide btn btn-success">Save</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="app-wrapper-footer">
    <div class="app-footer">
      <div class="app-footer__inner">
        <div class="app-footer-left">
          <ul class="nav">
            <li class="nav-item">
              <a href="javascript:void(0);" class="nav-link">
                Footer Link 1
              </a>
            </li>
            <li class="nav-item">
              <a href="javascript:void(0);" class="nav-link">
                Footer Link 2
              </a>
            </li>
          </ul>
        </div>
        <div class="app-footer-right">
          <ul class="nav">
            <li class="nav-item">
              <a href="javascript:void(0);" class="nav-link">
                Footer Link 3
              </a>
            </li>
            <li class="nav-item">
              <a href="javascript:void(0);" class="nav-link">
                <div class="badge badge-success mr-1 ml-0">
                  <small>NEW</small>
                </div>
                Footer Link 4
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>