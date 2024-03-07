<?php if (!isset($_SESSION)) {
    session_start();
} ?>

<header class="d-flex align-items-center" style="height: 100px; background-color:grey">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">

            <div>
                <form action="./server/logout_user.php" method="POST">
                    <button type="submit" class="btn btn-warning">Logout</button>
                </form>
            </div>
            <?php if (isset($_SESSION['id'])) { ?>
                <div class="card p-1 px-3 shadow bg-warning">
                    <p class="fw-bold fs-3 m-0">
                        <?php echo ucfirst($_SESSION['username']); ?>
                    </p>
                </div>

            <?php } ?>
        </div>
    </div>
</header>