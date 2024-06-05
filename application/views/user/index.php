<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4"></h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?php echo site_url('user')?>">User</a></li>
            <li class="breadcrumb-item active"><?php echo $title; ?></li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <a href="<?php echo site_url('user/add')?>"><i class="fas fa-plus"></i> Add New</a>
            </div>
            <?php if (!empty($success)): ?>
            <div class="alert alert-success" role="alert">
                <?php echo $success; ?>
            </div>
            <?php endif; ?>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="tabelkelas" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($user as $user_item) {
                                echo "<tr>
                                    <td>{$no}</td>
                                    <td>{$user_item->username}</td>
                                    <td>{$user_item->email}</td>
                                    <td>{$user_item->phone}</td>
                                    <td>{$user_item->role}</td>
                                    <td>
                                        <div>
                                            <a href='" . base_url('user/getedit/' . $user_item->id) . "' class='btn btn-sm btn-info'><i class='fas fa-edit'></i> Edit</a>
                                            <a href='" . base_url('user/delete/' . $user_item->id) . "' class='btn btn-sm btn-danger'
                                            onclick='return confirm(\"Ingin menghapus data user ini?\");'><i class='fas fa-trash'></i> Hapus</a>
                                        </div>
                                    </td>
                                </tr>";
                                $no++;
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div style="height: 100vh"></div>
    </div>
</main>
