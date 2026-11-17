<div class="mb-3"><label class="form-label">Full name *</label><input class="form-control" name="full_name" maxlength="120" required value="{{ old('full_name', $student->full_name ?? '') }}"></div>
<div class="mb-3"><label class="form-label">Email *</label><input class="form-control" type="email" name="email" maxlength="160" required value="{{ old('email', $student->email ?? '') }}"></div>
<div class="mb-3"><label class="form-label">Phone</label><input class="form-control" name="phone" maxlength="30" value="{{ old('phone', $student->phone ?? '') }}"></div>
<div class="mb-4"><label class="form-label">Course *</label><input class="form-control" name="course" maxlength="100" required placeholder="e.g. BS Computer Science" value="{{ old('course', $student->course ?? '') }}"></div>
