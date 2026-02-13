    <script>
        // Confirmación de eliminación
        function confirmarEliminacion(id, modulo) {
            if (confirm('¿Está seguro de eliminar este registro?')) {
                window.location.href = '/dashboard_sena/views/' + modulo + '/index.php?eliminar=' + id;
            }
        }
    </script>
</body>
</html>
