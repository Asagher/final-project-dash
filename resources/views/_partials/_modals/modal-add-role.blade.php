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
                <div class="d-flex">
                      @foreach ($permissions as $permission)
                        <div class="form-check me-3 me-lg-5">
                          <input class="form-check-input" type="checkbox" id="permission_role" name="permission_role[]" value="{{$permission->name}}" />
                          <label class="form-check-label" for="permission">
                            {{$permission->name}}
                          </label>
                        </div>
                      @endforeach
                </div>
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

