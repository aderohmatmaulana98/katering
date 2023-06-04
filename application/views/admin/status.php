<!-- partial -->
<!-- partial -->
<div class="main-panel">
	<div class="content-wrapper">
		<div class="mt-2">
			<?= $this->session->flashdata('message');  ?>
		</div>
		<div class="row">
			<div class="col-sm-6 mb-3">
				<h3 class="m-0"><?= $title; ?></h3>
			</div>
			<div class="col-md-12 grid-margin stretch-card">
				<div class="card position-relative">
					<div class="card-body">
						<div class="mb-3">
							<button type="button" class="btn btn-primary" data-toggle="modal"
								data-target="#exampleModal">
								Tambah
							</button>

							<!-- Modal -->
							<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
								aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Tambah Status </h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<form action="<?= base_url('admin/insert_status') ?>" method="POST">
												<div class="form-group">
													<label for="namastatus">Nama Status</label>
													<input type="text" class="form-control" id="namastatus"
														name="namastatus" required>
												</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary"
												data-dismiss="modal">Close</button>
											<button type="submit" class="btn btn-primary">Save changes</button>
										</div>
										</form>
									</div>
								</div>
							</div>
						</div>
						<div class="table-responsive">
							<table class="table align-middle">
								<thead>
									<tr>
										<th>No</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1;
                                    foreach ($status as $p) : ?>
									<tr>
										<td><?= $no; ?></td>
										<td><?= $p->nama_status; ?></td>
										<td>
											<a href="#" type="button" data-toggle="modal"
												data-target="#exampleModal1<?= $p->id; ?>"><span
													class="badge badge-pill badge-success">Edit</span></a>

											<!-- Modal -->
											<div class="modal fade" id="exampleModal1<?= $p->id; ?>" tabindex="-1"
												aria-labelledby="exampleModalLabel" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="exampleModalLabel">Edit Status
															</h5>
															<button type="button" class="close" data-dismiss="modal"
																aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<form action="<?= base_url('admin/update_status') ?>"
																method="POST"
																enctype="application/x-www-form-urlencoded">
																<div class="form-group">
																	<label for="nama_status">Nama status</label>
																	<input type="text" class="form-control"
																		id="nama_status" name="nama_status"
																		value="<?= $p->nama_status ?>" required>
																	<input type="text" class="form-control" id="id"
																		name="id" value="<?= $p->id ?>" hidden required>
																</div>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary"
																data-dismiss="modal">Close</button>
															<button type="submit" class="btn btn-primary">Save
																changes</button>
														</div>
														</form>
													</div>
												</div>
											</div>
											<a href="<?= base_url('admin/delete_status/' . $p->id); ?>"
												onclick="javascript: return confirm('Anda yakin akan menghapus ini? ')"><span
													class="badge badge-pill badge-danger">Hapus</span></a>
										</td>
									</tr>
									<?php $no++;
                                    endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
