function spinner_show(pElement) {
  $(pElement).html(`
    <div class="spinner">
        <div class="bounce1"></div>
  		<div class="bounce2"></div>
  		<div class="bounce3"></div>
	</div>
    `);
}

function spinner_hide(pElement) {
  $(pElement).html(``);
}
