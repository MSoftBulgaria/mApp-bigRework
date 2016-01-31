/**
 * Created by NikiHrs on 10.1.2016 г..
 */
function Category(id, textOfComent,video_id,user_id) {
    this.id = id;
    this.textOfComent = textOfComent;
    this.video_id = video_id;
    this.user_id = user_id;

    Model.call(this, name, id , textOfComent,video_id,user_id);
}

