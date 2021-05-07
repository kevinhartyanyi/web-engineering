import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { ServerService } from '../server.service';
import { Diary } from '../diary';

@Component({
  selector: 'app-diary-page',
  templateUrl: './diary-page.component.html',
  styleUrls: ['./diary-page.component.css']
})
export class DiaryPageComponent implements OnInit {

  diary = new Diary();

  constructor(private serverService: ServerService, private route: ActivatedRoute, private router: Router) {}


  async ngOnInit(): Promise<void> {
    const id = +this.route.snapshot.paramMap.get('id');
    this.diary = await this.serverService.getDiary(id);
    const dateRaw = this.diary.created_at;
    const date = new Date(Date.parse(dateRaw))
    this.diary.created_at = date.toISOString().split('T')[0];
  }

}
