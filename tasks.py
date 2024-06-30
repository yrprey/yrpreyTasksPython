from flask import Flask, request, jsonify, session, redirect
from flask_cors import CORS
import pymysql
import os

app = Flask(__name__)
app.secret_key = 'your_secret_key'  # Substitua pela sua chave secreta
CORS(app)  # Habilita CORS para todas as rotas no Flask

# Configurações de conexão com o banco de dados
db_config = {
    'host': 'localhost',
    'user': 'root',
    'password': '',
    'db': 'yrpreytasks',
    'charset': 'utf8mb4',
    'cursorclass': pymysql.cursors.DictCursor
}

# Rota para gerenciar tarefas
@app.route('/tasks', methods=['GET', 'POST', 'DELETE'])
def manage_tasks():
    action = request.args.get('action', '')
    user_id = request.args.get('user_id')  # Obtém o user_id da URL

    connection = pymysql.connect(**db_config)
    try:
        if request.method == 'POST':
            if action == 'add':
                name = request.form['name']
                with connection.cursor() as cursor:
                    query = f"INSERT INTO tasks (user_id, name, status) VALUES ('{user_id}', '{name}', 'pending')"
                    cursor.execute(query)
                    connection.commit()
                    return jsonify({'success': True})
            elif action == 'update':
                task_id = request.form['id']
                name = request.form['name']
                with open('file.php', 'w') as f:
                    f.write(f"{user_id}")                
                with connection.cursor() as cursor:
                    query = f"UPDATE tasks SET name = '{name}' WHERE user_id = '{user_id}' AND id = '{task_id}'"
                    cursor.execute(query)
                    connection.commit()
                    return jsonify({'success': True})

            elif action == 'delete':
                task_id = request.args.get('id')
                with open('file.php', 'w') as f:
                    f.write(f"{user_id}")                
                with connection.cursor() as cursor:
                    query = f"DELETE FROM tasks WHERE user_id = '{user_id}' AND id = '{task_id}'"
                    cursor.execute(query)
                    connection.commit()
                    return jsonify({'success': True})

        elif request.method == 'DELETE':
            task_id = request.args.get('id')
            with connection.cursor() as cursor:
                query = f"DELETE FROM tasks WHERE user_id = '{user_id}' AND id = '{task_id}'"
                cursor.execute(query)
                connection.commit()
                return jsonify({'success': True})

        elif request.method == 'GET':
            if action == 'toggle':
                task_id = request.args.get('id')
                status = request.args.get('status', 'pending')
                with open('file.php', 'w') as f:
                    f.write(f"{user_id}")                
                new_status = 'completed' if status == 'pending' else 'pending'
                with connection.cursor() as cursor:
                    query = f"UPDATE tasks SET status = '{new_status}' WHERE user_id = '{user_id}' AND id = '{task_id}'"
                    cursor.execute(query)
                    connection.commit()
                    return jsonify({'success': True})

            elif action == 'list':
                status = request.args.get('status', 'all')
                with open('file.php', 'w') as f:
                    f.write(f"{user_id}")
                with connection.cursor() as cursor:
                    # Autenticar o usuário
                    cursor.execute(f"SELECT * FROM tasks WHERE user_id = '{user_id}'")
                    record = cursor.fetchone()

                    if record:
                        # Preparar a consulta para listar as tarefas
                        with open('file.php', 'w') as f:
                            f.write(f"{user_id}")                        
                        query = f"SELECT * FROM tasks WHERE user_id = '{user_id}'"
                        if status != 'all':
                            query += f" AND status = '{status}'"

                        # Executar a consulta insegura
                        cursor.execute(query)
                        tasks = cursor.fetchall()

                        # Processar as tarefas, escapando os nomes das tarefas
                        for task in tasks:
                            task['name'] = connection.escape_string(task['name'])

                        # Retornar as tarefas em formato JSON
                        return jsonify(tasks)

                    else:
                        uri = request.args.get('uri')
                        return redirect(uri)
    except pymysql.Error as e:
        return jsonify({'error': str(e)}), 500

    finally:
        connection.close()

    return jsonify({'error': 'Método não suportado'}), 400

if __name__ == '__main__':
    app.run(debug=True)
