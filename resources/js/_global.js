validateSinglePermission = function(permission, userPermissions) {
    userPermissions.forEach(function(userPermission) {

        if (permission == userPermission) {
            console.log( 'check '+ (permission == userPermission))
            // console.log( 'check '+permission == userPermission)
            // console.log("userPermission :" + userPermission)
            return true
        }
    })

    return false;
}

validatePermission = function(permissions, userPermissions) {
    if(permissions === '' || permissions == null) {
        return true;
    }

    if(typeof permissions == 'string') {
        return validateSinglePermission(permissions, userPermissions)
    }

    if(Array.isArray(permissions)) {
        permissions.forEach(function (item) {

            userPermissions.forEach(function(userPermission) {

                if (item == userPermission) {
                    return true
                }
            })
        })
    }

    return false;
}
