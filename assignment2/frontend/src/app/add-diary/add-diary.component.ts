import { Component } from '@angular/core';
import { Diary } from '../diary';

@Component({
  selector: 'app-add-diary',
  templateUrl: './add-diary.component.html',
  styleUrls: ['./add-diary.component.css']
})
export class AddDiaryComponent {

  model = new Diary("Title", "Content");

  submitted = false;

  onSubmit() { this.submitted = true; }

  // TODO: Remove this when we're done
  get diagnostic() { return JSON.stringify(this.model); }

}
