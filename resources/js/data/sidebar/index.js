export let menu

export default menu = [
    {
        "title" : "User Management",
        "icon" : "fas fa-tachometer-alt",
        "link" : "#",
        'folder' : "users",
        "permission" : "list_users",
        "sub_list" : [
            {
                "title" : "Users List",
                "icon" : "fas fa-user nav-icon",
                "route" : "users.index",
                "component" : "users/Index",
                "permission" : "list_users"
            },{
                "title" : "Add User",
                "icon" : "fas fa-user nav-icon",
                "route" : "users.create",
                "component" : "users/Create",
                "permission" : "create_users"
            },
        ]
    },
    {
        "title" : "Role Management",
        "icon" : "fas fa-tachometer-alt",
        "link" : "#",
        "folder" : "roles",
        "permission" : "list_roles",
        "sub_list" : [
            {
                "title" : "Roles List",
                "icon" : "fas fa-user nav-icon",
                "route" : "roles.index",
                "component" : "roles/Index",
                "permission" : "list_roles"
            },{
                "title" : "Add Role",
                "icon" : "fas fa-user nav-icon",
                "route" : "roles.create",
                "component" : "roles/Create",
                "permission" : "create_roles"
            },
        ]
    }
]
