<div>
  <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          #
                      </th>
                      <th style="width: 20%">
                         Photo
                      </th>
                      <th style="width: 18%" class="text-center">
                          Type gallary
                      </th>
                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($gallaries as $gallary)
                  <tr>
                      <td>
                          #
                      </td>
                      <td class="project-state">
                          @if($gallary->type_gallary == 'image')
                              <img src="{{\Storage::url($gallary->image)}}" width="200px" alt="">
                          @else
                              {{$gallary->url}}
                          @endif
                      </td>
                      <td>
                         {{$gallary->type_gallary}}
                      </td>
                      <td class="project-actions text-right">
                          {{-- <a class="btn btn-primary btn-sm" href="{{route('.show', $gallary->id)}}">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a> --}}
                          <a class="btn btn-info btn-sm" href="{{route('gallary.edit', $gallary->id)}}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm" href="{{route('gallary.delete', $gallary->id)}}">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
</div>
