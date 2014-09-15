  				
				<?php $form=$this->beginWidget('CActiveForm', array(
					'action'=>$this->createAbsoluteUrl('suggestion'.$actionSufix),
					'id'=>'suggestion-form'/*,
					'enableClientValidation'=>true,
					'clientOptions'=>array(
						'validateOnSubmit'=>true,
					)*/)
					); ?>
					
					<div class="row">
						<div class="form-group col-sm-16"> 
						<?php echo $form->labelEx($model,'email'); ?>
						<?php echo $form->textField($model,'email',array('class'=>'form-control')); ?>
						<?php echo $form->error($model,'email'); ?>
						</div>
					</div>

					<div class="row">
						<div class="form-group col-sm-16">
						<?php echo $form->labelEx($model,'body'); ?>
						<?php echo $form->textArea($model,'body',array('class'=>'form-control','rows'=>6)); ?>
						<?php echo $form->error($model,'body'); ?>
						</div>
					</div>

					<div class="row">
						<div class=" col-sm-16">
						<p class="note">Fields with <span class="required">*</span> are required.</p>
						<?php echo CHtml::htmlButton('Submit',array('id'=>'suggestion-submit', 'class'=>"btn btn-primary")); ?>
						</div>
					</div>

				<?php $this->endWidget(); ?>
