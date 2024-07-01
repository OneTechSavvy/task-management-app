$(document).ready(function() {
    let taskList = document.getElementById('task_list');

    if (taskList) {
        Sortable.create(taskList, {
            onEnd: function(event) {
                let tasks = [];
                $('#task_list li').each(function(index, element) {
                    tasks.push({
                        id: $(element).data('id'),
                        priority: index + 1
                    });
                });

                $.ajax({
                    url: '/tasks/reorder',
                    type: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        tasks: tasks
                    },
                    success: function(response) {
                        console.log(response);
                        reloadTasks();
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    }

    $('#project-filter').on('change', function() {
        let selectedProjectId = $(this).val();
        filterTasksByProject(selectedProjectId);
    });

    function reloadTasks() {
        $.get('/tasks', function(data) {
            $('#app').html(data);
            reinitializeSortable();
        });
    }

    function reinitializeSortable() {
        if (taskList) {
            Sortable.create(taskList, {
                onEnd: function(event) {
                    let tasks = [];
                    $('#task_list li').each(function(index, element) {
                        tasks.push({
                            id: $(element).data('id'),
                            priority: index + 1
                        });
                    });

                    $.ajax({
                        url: '/tasks/reorder',
                        type: 'POST',
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content'),
                            tasks: tasks
                        },
                        success: function(response) {
                            reloadTasks();
                        },
                        error: function(xhr) {
                            console.error(xhr.responseText);
                        }
                    });
                }
            });
        }
    }

    function filterTasksByProject(projectId) {
        if (!projectId) {
            $('#task_list li').show();
        } else {
            $('#task_list li').each(function() {
                let taskProjectId = $(this).data('project-id');

                if (taskProjectId == projectId) {
                    $(this).css('display', 'flex');
                } else {
                    $(this).attr('style', 'display: none !important');
                }
            });
        }
    }
});
