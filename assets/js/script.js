// Minimal JS used across the portal
document.addEventListener('DOMContentLoaded', function(){
	// Confirm navigation for destructive actions (example)
	document.querySelectorAll('[data-confirm]').forEach(function(el){
		el.addEventListener('click', function(e){
			if (!confirm(el.getAttribute('data-confirm'))) e.preventDefault();
		});
	});
});
