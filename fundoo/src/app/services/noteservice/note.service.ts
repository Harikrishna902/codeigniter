import { Injectable } from '@angular/core';
import { HttpClient,HttpHeaders  } from "@angular/common/http";
import { serviceUrl } from "../../serviceUrl/serviceurl.service";
import { ActivatedRoute } from '@angular/router';

@Injectable({
  providedIn: 'root'
})
export class NoteService {

  constructor(private http: HttpClient, private serviceUrl: serviceUrl, private route: ActivatedRoute) { }

  /**
   * function to create note
   * @method createNotes
   * @param note 
   * @param email 
   * @param time
   * @returns obseravble data
   */
  createNotes(note, email,time,color) {
    let createnotes = new FormData();
    createnotes.append("email", email);
    createnotes.append("title", note.title);
    createnotes.append("description", note.description);
    createnotes.append("reminder",time);
    createnotes.append("color",color);
  //   return this.http.post(this.serviceUrl.host + this.serviceUrl.createnotes, createnotes);

  // }


  let headers_object = new HttpHeaders().set("Authorization",
			
  localStorage.getItem("token")
);

 
  console.log(headers_object);
  return this.http.post(this.serviceUrl.host+this.serviceUrl.createnotes,createnotes,{headers:headers_object});

 }
  
/**
 * function to dispaly notes
 * @method displayNotes
 * @param data 
 * @returns obseravble data
 */
  displayNotes(data) {
    let emaildata = new FormData();
    emaildata.append("email", data);

    return this.http.post(this.serviceUrl.host + this.serviceUrl.displaynotes, emaildata);
  }

  /**
   * function to delete note
   * @param data
   * @method deleteNotes
   * @returns obseravble data
   */
  deleteNotes(data){
    let id=new FormData();
    id.append("id",data);
    return this.http.post(this.serviceUrl.host + this.serviceUrl.delete,id);
  }

  changeColor(id,colour)
  {
    debugger;
    let color = new FormData();
    color.append('id',id);
    color.append('colour',colour)
    return this.http.post(this.serviceUrl.host+this.serviceUrl.changeColor,color);
  }

}
