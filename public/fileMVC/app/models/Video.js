/**
 * Created by NikiHrs on 10.1.2016 г..
 */
function Video(id, name_to_display,description,
               user_id,categorie_id,thumbnail_id) {
    this.id = id;
    this.name_to_display = name_to_display;
    this.description = description;
    this.user_id = user_id;
    this.categorie_id = categorie_id;
    this.thumbnail_id = thumbnail_id;


    Model.call(this, name, name_to_display,description
    ,user_id,categorie_id,thumbnail_id);
}

