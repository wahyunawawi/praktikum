<main>
    <div class="container-fluit">
    <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?php echo site_url('user') ?>">User</a></li>
            <li class="breadcrumb-item active"><?php echo $title ?></li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                <form action="<?php echo site_url('user/edit') ?>" method="post">
                <div class="mb-3">
                    <label for="username">Username<code>*</code></label>
                    <input class="form-control" type="hidden" name="id" value="<?=$user->id;?>" required />
                    <input class="form-control <?php echo form_error('username') ? 'is_invalid':''?>"
                        type="text" name="username" value="<?=$user->username;?>" placeholder="USERNAME" required />
                    <div class="invalid-feedback">
                        <?php echo form_error('username') ?>
                    </div> 
                </div>
                <div class="mb-3">
                    <label for="full_name">Nama Lengkap <code>*</code></label>
                    <input class="form-control" type="text" name="full_name" value="<?=$user->full_name;?>" placeholder="FULL_NAME" required />
                </div>
                <div class="mb-3">
                    <label for="phone">Telp <code>*</code></label>
                    <input class="form-control" type="text" name="phone" value="<?=$user->phone;?>" placeholder="PHONE" required />
                </div>
                <div class="mb-3">
                    <label for="email">Email <code>*</code></label>
                    <input class="form-control" type="text" name="email" value="<?=$user->email;?>" placeholder="EMAIL" required />
                </div>
                <div class="mb-3">
                    <label for="role">Jabatan</label>
                    <select class="form-select" name="role" id="id" required>
                    <?php if($user->role == 'OWNER'){?>
                        <option value="OWNER" selected>Owner</option>
                        <option value="ADMIN">Admin</option>
                        <option value="KASIR">Kasir</option>
                    <?php }else if($user->role == 'ADMIN'){?>
                        <option value="OWNER" selected>Owner</option>
                        <option value="ADMIN">Admin</option>
                        <option value="KASIR">Kasir</option>
                    <?php }else{?>
                        <option value="OWNER" selected>Owner</option>
                        <option value="ADMIN">Admin</option>
                        <option value="KASIR">Kasir</option>
                    <?php }?>
                    </select>
                </div>
                <button class="btn btn-primary" type="submit"><i class="fas fa-plus"></i> Update</button>
            </form>
            </div>
        </div>
    </div>
</main>