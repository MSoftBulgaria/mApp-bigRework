/**
 * Created by NikiHrs on 11.1.2016 г..
 */
function User(id, user,role) {
    this.id = id;
    this.user = user;
    this.role = role;

    Model.call(this, id, user,role);
}

