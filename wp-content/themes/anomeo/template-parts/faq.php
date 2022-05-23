<div class="faq_block">
	<button class="faq_btn open"><? _e('FAQ', 'anomeo'); ?></button>

	<div id="openModal" class="modalDialog">
		<button class="faq_btn close"><? _e('Close FAQ', 'anomeo'); ?></button>

		<p class="faq_title">
			<? _e('POPULAR QUESTIONS', 'anomeo'); ?>
		</p>
		<div class="faq_question">
			<? if (have_rows('faq', 'option')) : ?>

				<?php while (have_rows('faq', 'option')) : the_row();
					$question = get_sub_field('question');
					$answer = get_sub_field('answer');
				?>
					<div class="question_block">
						<p class="question"><? echo $question ?></p>
						<div class="answer">
							<? echo $answer ?>
						</div>



					</div>
				<?php endwhile; ?>

			<? endif; ?>

			<div class="faq-footer">
				<button class="back"><?php _e('BACK TO THE LIST OF QUESTIONS', 'anomeo') ?></button>
			</div>
		</div>


	</div>
</div>