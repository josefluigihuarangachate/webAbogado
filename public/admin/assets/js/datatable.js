// Basic DataTable	
$('#basicDataTable').DataTable({
    responsive: true,
    language: {
        searchPlaceholder: 'Buscar...',
        sSearch: ''
    }
});

// No Style DataTable	
$('#noStyleedTable').DataTable({
//    responsive: true,
    language: {
        searchPlaceholder: 'Buscar...',
        sSearch: ''
    }
});

// Compact DataTable	
$('#compactTable').DataTable({
    responsive: true,
    language: {
        searchPlaceholder: 'Buscar...',
        sSearch: ''
    }
});

// Hoverable DataTable	
$('#hoverTable').DataTable({
    responsive: true,
    language: {
        searchPlaceholder: 'Buscar...',
        sSearch: ''
    }
});

// Scrollable Table DataTable	
$('#scrollableTable').DataTable({
    responsive: true,
    language: {
        searchPlaceholder: 'Buscar...',
        sSearch: ''
    },
    "order": [[1, "desc"]],
    "scrollY": "250px",
    "scrollCollapse": true,
    "paging": false
});
