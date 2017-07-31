<div
	class="egr-row <?php echo egr::oddEven($presentation['_level'] + 1) . egr::style($presentation); ?>"
	data-field-name="<?php echo $field_name; ?>"
	data-id="<?php echo $id; ?>"
	data-count="<?php echo egr::count($presentation); ?>"
	data-fieldset-count="<?php echo count($presentation['_dropdown']); ?>"
>
	<?php if(isset($presentation['label'])) : ?>
		<label class="label"><?php echo $presentation['label']; ?></label>
	<?php endif; ?>	

	<div class="egr-fieldsets<?php echo egr::grid($presentation); ?>">
		<?php if(isset($presentation['sets'])) : ?>
			<?php $first = array_values($presentation['sets'])[0]; ?>
			<?php if(isset($first['labels']) && !empty($first['labels'])) : ?>
				<div class="egr-labels"><?php
					foreach($first['labels'] as $field_key => $field) :
						?><div data-prefix="_i3_egr__" data-field-name="text" class="field egr-field field-grid-item field-grid-item-1-2 field-name-text_i3_egr__">
							<label class="label" data-for="form-field-text_i3_egr__"><?php echo $field['label']; ?></label>
						</div><?php endforeach;
				?>
				</div>
			<?php endif; ?>
			<?php
				foreach($presentation['sets'] as $set_id => $set ) :
					?><div class="egr-fieldset" data-fieldset-name="<?php echo $set['name']; ?>">
						<div class="egr-fields"><?php
							echo $instance->presentation()->render(array(
								'instance' => $instance,
								'set' => $set,
								'id' => $id,
							));
						?></div>
					<?php echo egr::snippet('actions', array('buttons' => egr::buttons($presentation))); ?>
				</div><?php
			endforeach; endif; ?>
	</div>

	<?php echo egr::snippet('row-meta', array('fieldset_names' => $presentation['_dropdown'])); ?>
</div>