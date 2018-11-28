



<div style="padding: 100px 0;">
	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<div class="banner-section__text">
					<div class="card no-border">
						<div class="card-header bg-primary text-white">
							<h5 class="mb-0">Login Admin</h5>
						</div>
						<div class="card-body">
							<?php if(isset($message)): ?>
								<div class="alert alert-warning alert-dismissible fade show" role="alert">
									<p><?php echo $message ?></p>
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
							<?php endif; ?>
							<form action="<?php echo base_url('page/submit_admin_login') ?>" method="POST">
								<div class="form-group">
									<label for="email">Email address</label>
									<input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="<?php echo set_value('email') ?>">
									<?php echo form_error('email') ?>
								</div>
								<div class="form-group">
									<label for="password">Password</label>
									<input type="password" class="form-control" id="password" name="password" placeholder="Password">
									<?php echo form_error('password') ?>
								</div>
								<button type="submit" class="btn btn-primary">Submit</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>





