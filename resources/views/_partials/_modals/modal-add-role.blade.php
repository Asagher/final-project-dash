<!-- Add Role Modal -->
<div class="modal fade" id="addRoleModal" tabindex="-1" aria-hidden="true" >
  <div class="modal-dialog modal-lg modal-simple modal-dialog-centered modal-add-new-role">
    <div class="modal-content p-3 p-md-5">
      <div class="modal-body">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="text-center mb-4">
          <h3 class="role-title">Add New Role</h3>
          <p>Set role permissions</p>
        </div>
        <!-- Add role form -->
        <form id="addRoleForm" class="row g-3" >
          @csrf
          <div class="col-12 mb-4">
            <label class="form-label" for="modalRoleName">Role Name</label>
            <input type="hidden" id="modalRoleId" name="modalRoleId">
            <input type="text" id="modalRoleName" name="modalRoleName" class="form-control" placeholder="Enter a role name" tabindex="-1" />
          </div>
          <div class="col-12">
            <h4>Role Permissions</h4>
            <!-- Permission table -->
            <div class="table-responsive">
              <table class="table table-permissions">
                <tbody>
                  <tr>
                    <td class="text-nowrap fw-medium">Administrator Access <i class="bx bx-info-circle bx-xs" data-bs-toggle="tooltip" data-bs-placement="top" title="Allows a full access to the system"></i></td>
                    <td>

                    </td>
                  </tr>
                  @foreach ($roles as $role)
                    <tr>
                      <td class="text-nowrap fw-medium">{{$role->name}} <i class="bx bx-info-circle bx-xs" data-bs-toggle="tooltip" data-bs-placement="top" title="Allows a full access to the system"></i></td>
                      <td>
                        <div class="d-flex">
                          @if ($role->name=='admin')
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" id="selectAll" />
                              <label class="form-check-label" for="selectAll">
                                Select All
                              </label>
                            </div>
                            @else
                              @foreach ($permissions as $permission)
                                <div class="form-check me-3 me-lg-5">
                                  <input class="form-check-input" type="checkbox" id="userManagementRead" />
                                  <label class="form-check-label" for="userManagementRead">
                                    {{$permission->name}}
                                  </label>
                                </div>
                              @endforeach
                          @endif

                        </div>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- Permission table -->
          </div>
          <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary me-sm-3 me-1" >Submit</button>
            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
          </div>
        </form>
        <!--/ Add role form -->
      </div>
    </div>
  </div>
</div>
<!--/ Add Role Modal -->

