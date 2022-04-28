export let menu

export default menu = [
    {
        "title" : "User Management",
        "icon" : "fas fa-tachometer-alt",
        "link" : "#",
        'folder' : "users",
        "sub_list" : [
            {
                "title" : "Users List",
                "icon" : "fas fa-user nav-icon",
                "route" : "users.index",
                "component" : "users/Index"
            },{
                "title" : "Add User",
                "icon" : "fas fa-user nav-icon",
                "route" : "users.create",
                "component" : "users/Create"
            },
        ]
    }
]
