<table class="table table-hover" id="examTable">
									<thead class="text-muted">
										<tr>
											<th><strong>#</strong></th>
											<th><strong>Examination</strong></th>
											<th><strong>Result Score</strong></th>
											<th><strong>Date</strong></th>
											<th><strong>Action</strong></th>
										</tr>
										<?php	

											if (mysqli_num_rows($result) > 0) {
											$sn=1;
											while($data = mysqli_fetch_assoc($result)) {
											?>
											<tr>
											<td><?php echo $data['student_id']; ?> </td>
											<td><?php echo $data['exam_id']; ?> </td>
											<td><?php echo $data['result_answer']; ?> </td>
											<td><?php echo $data['result_date']; ?> </td>
											<tr>
											<?php
											$sn++;}} else { ?>
												<tr>
												<td colspan="5">No data found</td>
												</tr>

											<?php } ?>
									</thead>
									<tbody>
									</tbody>
								</table>