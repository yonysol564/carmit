<?php $product_table_content = get_field("product_table_content"); ?>
<?php if ($product_table_content) { ?>
<section class="product_table_sec">
	<div class="row">
		<div class="container">
		    <div class="row">
		        <div class="col-lg-9 col-md-12">
		        	<h4><strong><?php echo get_field('packaging_options', 'option'); ?></strong></h4>

					<div class="outer_table desktop_only">
						<table class="table table-striped">
							<thead>
								<tr>
									<?php foreach ($product_table_content as $th): ?>
										<th><?php echo $th['th'][0]['th_title']; ?></th>
									<?php endforeach ?>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($product_table_content as $tr): ?>
									<tr>
										<?php $td_rep = $tr['td']; //print_r($td_rep); ?>
										<?php if ($td_rep) { ?>
											<?php foreach ($td_rep as $td): ?>
												<td><?php echo $td['td_title']; ?></td>
											<?php endforeach ?>
										<?php } ?>
									</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>

		        </div>
		    </div>
		</div>
	</div>
</section>
<?php } ?>
