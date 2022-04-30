
validateSinglePermission = function(permission) {
    console.log(permission)
}

validatePermission = function(permissions) {
    if(permissions === '' || permissions == null) {
        return true;
    }

    if(typeof permissions == 'string') {
        validateSinglePermission(permissions)
    }

    if(Array.isArray(permissions)) {
        permissions.forEach(function (item) {
            validateSinglePermission(item)
        })
    }

    return false;
}
