// Categorizing Tags
var $el = $('#bs-tagsinput-cat');
$el.tagsinput({
  tagClass: function(item) {
	switch (item.continent) {
	  case 'Europe'   : return 'badge badge-primary';
	  case 'America'  : return 'badge badge-danger';
	  case 'Australia': return 'badge badge-success';
	  case 'Asia'     : return 'badge badge-warning';
	  case 'Africa'   : return 'badge badge-info';
	}
  },

  itemValue: 'value',
  itemText:  'text',
});
$el.tagsinput('add', { value: 1,  text: 'Amsterdam',  continent: 'Europe' });
$el.tagsinput('add', { value: 4,  text: 'Washington', continent: 'America' });
$el.tagsinput('add', { value: 7,  text: 'Sydney',     continent: 'Australia' });
$el.tagsinput('add', { value: 10, text: 'Beijing',    continent: 'Asia' });
$el.tagsinput('add', { value: 13, text: 'Cairo',      continent: 'Africa' });


// Color Tags
$('#tagsinput-primary').tagsinput({ tagClass: 'badge badge-primary' });
$('#tagsinput-secondary').tagsinput({ tagClass: 'badge badge-secondary' });
$('#tagsinput-success').tagsinput({ tagClass: 'badge badge-success' });
$('#tagsinput-info').tagsinput({ tagClass: 'badge badge-info' });
$('#tagsinput-warning').tagsinput({ tagClass: 'badge badge-warning' });
$('#tagsinput-danger').tagsinput({ tagClass: 'badge badge-danger' });
$('#tagsinput-dark').tagsinput({ tagClass: 'badge badge-dark' });