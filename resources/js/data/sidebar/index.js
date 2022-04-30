export let menu
// todo : protect menu items with permissions
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
    }
]
