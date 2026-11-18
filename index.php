<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba de GitHub  Utiliza esta lista</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f0f2f5; max-width: 500px; margin: 40px auto; padding: 20px; }
        .card { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        .input-group { display: flex; gap: 8px; margin-bottom: 15px; }
        input { flex: 1; padding: 10px; border: 1px solid #ccc; border-radius: 4px; }
        button { padding: 10px 15px; background: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background: #0056b3; }
        ul { list-style: none; padding: 0; }
        li { display: flex; justify-content: space-between; align-items: center; padding: 10px; border-bottom: 1px solid #eee; }
        .delete { background: #dc3545; padding: 5px 10px; font-size: 12px; }
        .delete:hover { background: #c82333; }
    </style>
</head>
<body>
    <div class="card">
        <h2>Mis Tareas</h2>
        <div class="input-group">
            <input type="text" id="tareaInput" placeholder="Escribe una nueva tarea...">
            <button onclick="agregarTarea()">Agregar</button>
        </div>
        <ul id="listaTareas"></ul>
    </div>

    <script>
        let tareas = JSON.parse(localStorage.getItem('tareas')) || [];

        function mostrarTareas() {
            const lista = document.getElementById('listaTareas');
            lista.innerHTML = '';
            tareas.forEach((tarea, index) => {
                lista.innerHTML += `<li>${tarea} <button class="delete" onclick="eliminarTarea(${index})">X</button></li>`;
            });
        }

        function agregarTarea() {
            const input = document.getElementById('tareaInput');
            if (input.value.trim() !== '') {
                tareas.push(input.value.trim());
                localStorage.setItem('tareas', JSON.stringify(tareas));
                input.value = '';
                mostrarTareas();
            }
        }

        function eliminarTarea(index) {
            tareas.splice(index, 1);
            localStorage.setItem('tareas', JSON.stringify(tareas));
            mostrarTareas();
        }

        mostrarTareas();
    </script>
</body>
</html>