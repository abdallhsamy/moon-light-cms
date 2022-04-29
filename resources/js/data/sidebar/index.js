export let menu
// todo : protect menu items with permissions
export default menu = [
    {
        "title" : "User Management",
        "icon" : "fas fa-tachometer-alt",
        "link" : "#",
        'prefix' : "users",
        "sub_list" : [
            {
                "title" : "Users List",
                "icon" : "fas fa-user nav-icon",
                "route" : "users.index",
                "component" : "User::Index"
            },{
                "title" : "Add User",
                "icon" : "fas fa-user nav-icon",
                "route" : "users.create",
                "component" : "User::Create"
            },
        ]
    }
]
