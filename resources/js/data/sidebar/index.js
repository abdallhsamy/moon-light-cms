export let menu
// todo : protect menu items with permissions
export default menu = [
    {
        "title" : "User Management",
        "icon" : "fas fa-tachometer-alt",
        "link" : "#",
        'folder' : "users",
        "permissions" : ["list_users", "create_users"
        ],
        "sub_list" : [
            {
                "title" : "Users List",
                "icon" : "fas fa-user nav-icon",
                "route" : "users.index",
                "component" : "users/Index",
                "permissions" : ["list_users"]
            },{
                "title" : "Add User",
                "icon" : "fas fa-user nav-icon",
                "route" : "users.create",
                "component" : "users/Create",
                "permissions" : ["create_users"]
            },
        ]
    }
]
