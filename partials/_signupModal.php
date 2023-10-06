<!-- Modal -->
<div class="modal fade" id="singUpModal" tabindex="-1" aria-labelledby="singUpModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="singUpModalLabel">SignUp for a WinDiscuss Account</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/Forum/partials/_handleSignup.php" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="signupMail" class="form-label">Email address</label>
                        <input type="text" class="form-control" id="signupMail" name="signupMail"
                            aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="signupPassword" name="signupPassword">
                    </div>
                    <div class="mb-3">
                        <label for="cpassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="signupcPassword" name="signupcPassword">
                    </div>
                    <button type="submit" class="btn btn-primary">SignUp</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>