import { Location } from '@angular/common';
import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { Diary } from '../diary';
import { ServerService } from '../server.service';

@Component({
  selector: 'app-add-diary',
  templateUrl: './add-diary.component.html',
  styleUrls: ['./add-diary.component.css']
})
export class AddDiaryComponent {

  diary = new Diary();

  constructor(private serverService: ServerService,
    private route: ActivatedRoute,
    private location: Location,
    private router: Router) {
    }

  async ngOnInit(): Promise<void> {
    const id = this.route.snapshot.paramMap.get('id');
    if (id) {
      this.diary = await this.serverService.getDiary(+id);
    }
  }

  async handleSave(diary: Diary): Promise<void> {
    if (this.diary.id) {
      await this.serverService.updateDiary(this.diary.id, diary);
      this.location.back();
    } else {
      await this.serverService.addDiary(diary);
      this.router.navigate(['/diary']);
    }
  }

  submitted = false;

  onSubmit() {
    this.submitted = true;
    this.diary.author = "Unknown";
    this.handleSave(this.diary);
  }

}
