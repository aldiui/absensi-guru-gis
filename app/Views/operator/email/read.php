<?= $this->extend('template/layout_admin') ?>
<?= $this->section('content') ?>
<?php $rusak = validation_errors();?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title;?></h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="font-weight-bold"><?= $title;?></div>
                        </div>
                        <div class="card-body">
                            <form action="" method="post" autocomplete="off">
                                <?= csrf_field();?>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="from_email">From Email</label>
                                            <input type="email"
                                                class="form-control <?= !empty($error['from_email']) ? 'is-invalid' : ''; ?>"
                                                name="from_email" id="from_email"
                                                value="<?= old('from_email', $email['from_email']); ?>">
                                            <small class="invalid-feedback">
                                                <?= !empty($error['from_email']) ? validation_show_error('from_email') : ''; ?>
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="from_name">From Name</label>
                                            <input type="text"
                                                class="form-control <?= !empty($error['from_name']) ? 'is-invalid' : ''; ?>"
                                                name="from_name" id="from_name"
                                                value="<?= old('from_name', $email['from_name']); ?>">
                                            <small class="invalid-feedback">
                                                <?= !empty($error['from_name']) ? validation_show_error('from_name') : ''; ?>
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="recipients">Recipients</label>
                                            <input type="text"
                                                class="form-control <?= !empty($error['recipients']) ? 'is-invalid' : ''; ?>"
                                                name="recipients" id="recipients"
                                                value="<?= old('recipients', $email['recipients']); ?>">
                                            <small class="invalid-feedback">
                                                <?= !empty($error['recipients']) ? validation_show_error('recipients') : ''; ?>
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="user_agent">User Agent</label>
                                            <input type="text"
                                                class="form-control <?= !empty($error['user_agent']) ? 'is-invalid' : ''; ?>"
                                                name="user_agent" id="user_agent"
                                                value="<?= old('user_agent', $email['user_agent']); ?>">
                                            <small class="invalid-feedback">
                                                <?= !empty($error['user_agent']) ? validation_show_error('user_agent') : ''; ?>
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="protocol">Protocol</label>
                                            <input type="text"
                                                class="form-control <?= !empty($error['protocol']) ? 'is-invalid' : ''; ?>"
                                                name="protocol" id="protocol"
                                                value="<?= old('protocol', $email['protocol']); ?>">
                                            <small class="invalid-feedback">
                                                <?= !empty($error['protocol']) ? validation_show_error('protocol') : ''; ?>
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="mail_path">Mail Path</label>
                                            <input type="text"
                                                class="form-control <?= !empty($error['mail_path']) ? 'is-invalid' : ''; ?>"
                                                name="mail_path" id="mail_path"
                                                value="<?= old('mail_path', $email['mail_path']); ?>">
                                            <small class="invalid-feedback">
                                                <?= !empty($error['mail_path']) ? validation_show_error('mail_path') : ''; ?>
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="smtp_host">Smtp Host</label>
                                            <input type="text"
                                                class="form-control <?= !empty($error['smtp_host']) ? 'is-invalid' : ''; ?>"
                                                name="smtp_host" id="smtp_host"
                                                value="<?= old('smtp_host', $email['smtp_host']); ?>">
                                            <small class="invalid-feedback">
                                                <?= !empty($error['smtp_host']) ? validation_show_error('smtp_host') : ''; ?>
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="smtp_user">Smtp User</label>
                                            <input type="text"
                                                class="form-control <?= !empty($error['smtp_user']) ? 'is-invalid' : ''; ?>"
                                                name="smtp_user" id="smtp_user"
                                                value="<?= old('smtp_user', $email['smtp_user']); ?>">
                                            <small class="invalid-feedback">
                                                <?= !empty($error['smtp_user']) ? validation_show_error('smtp_user') : ''; ?>
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="smtp_pass">Smtp Pass</label>
                                            <input type="text"
                                                class="form-control <?= !empty($error['smtp_pass']) ? 'is-invalid' : ''; ?>"
                                                name="smtp_pass" id="smtp_pass"
                                                value="<?= old('smtp_pass', $email['smtp_pass']); ?>">
                                            <small class="invalid-feedback">
                                                <?= !empty($error['smtp_pass']) ? validation_show_error('smtp_pass') : ''; ?>
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="smtp_port">Smtp Port</label>
                                            <input type="text"
                                                class="form-control <?= !empty($error['smtp_port']) ? 'is-invalid' : ''; ?>"
                                                name="smtp_port" id="smtp_port"
                                                value="<?= old('smtp_port', $email['smtp_port']); ?>">
                                            <small class="invalid-feedback">
                                                <?= !empty($error['smtp_port']) ? validation_show_error('smtp_port') : ''; ?>
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="smtp_timeout">Smtp Timeout</label>
                                            <input type="text"
                                                class="form-control <?= !empty($error['smtp_timeout']) ? 'is-invalid' : ''; ?>"
                                                name="smtp_timeout" id="smtp_timeout"
                                                value="<?= old('smtp_timeout', $email['smtp_timeout']); ?>">
                                            <small class="invalid-feedback">
                                                <?= !empty($error['smtp_timeout']) ? validation_show_error('smtp_timeout') : ''; ?>
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="smtp_keep_alive" class="form-label">Smtp Keep Alive</label>
                                            <div class="btn-group btn-group-toggle btn-block" data-toggle="buttons">
                                                <label
                                                    class="btn btn-lg btn-outline-success w-50 <?= (old('smtp_keep_alive', $email['smtp_keep_alive']) == 1) ? "active" : ""; ?>">
                                                    <input type="radio" name="smtp_keep_alive" value="1"
                                                        <?= (old('smtp_keep_alive', $email['smtp_keep_alive']) == 1) ? "checked active" : ""; ?>>
                                                    Aktif
                                                </label>
                                                <label
                                                    class="btn btn-lg btn-outline-danger w-50 <?= (old('smtp_keep_alive', $email['smtp_keep_alive']) == 0) ? "active" : ""; ?>">
                                                    <input type="radio" name="smtp_keep_alive" value="0"
                                                        <?= (old('smtp_keep_alive', $email['smtp_keep_alive']) == 0) ? "active" : ""; ?>>
                                                    Tidak Aktif
                                                </label>
                                            </div>
                                            <small class="invalid-feedback">
                                                <?= !empty($rusak['smtp_keep_alive']) ? validation_show_error('smtp_keep_alive') : ''; ?>
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="smtp_crypto">Smtp Crypto</label>
                                            <input type="text"
                                                class="form-control <?= !empty($error['smtp_crypto']) ? 'is-invalid' : ''; ?>"
                                                name="smtp_crypto" id="smtp_crypto"
                                                value="<?= old('smtp_crypto', $email['smtp_crypto']); ?>">
                                            <small class="invalid-feedback">
                                                <?= !empty($error['smtp_crypto']) ? validation_show_error('smtp_crypto') : ''; ?>
                                            </small>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="word_wrap" class="form-label">Word Wrap</label>
                                            <div class="btn-group btn-group-toggle btn-block" data-toggle="buttons">
                                                <label
                                                    class="btn btn-lg btn-outline-success w-50 <?= (old('word_wrap', $email['word_wrap']) == 1) ? "active" : ""; ?>">
                                                    <input type="radio" name="word_wrap" value="1"
                                                        <?= (old('word_wrap', $email['word_wrap']) == 1) ? "checked active" : ""; ?>>
                                                    Aktif
                                                </label>
                                                <label
                                                    class="btn btn-lg btn-outline-danger w-50 <?= (old('word_wrap', $email['word_wrap']) == 0) ? "active" : ""; ?>">
                                                    <input type="radio" name="word_wrap" value="0"
                                                        <?= (old('word_wrap', $email['word_wrap']) == 0) ? "active" : ""; ?>>
                                                    Tidak Aktif
                                                </label>
                                            </div>
                                            <small class="invalid-feedback">
                                                <?= !empty($rusak['word_wrap']) ? validation_show_error('word_wrap') : ''; ?>
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="wrap_chars">Wrap Chars</label>
                                            <input type="text"
                                                class="form-control <?= !empty($error['wrap_chars']) ? 'is-invalid' : ''; ?>"
                                                name="wrap_chars" id="wrap_chars"
                                                value="<?= old('wrap_chars', $email['wrap_chars']); ?>">
                                            <small class="invalid-feedback">
                                                <?= !empty($error['wrap_chars']) ? validation_show_error('mail_type') : ''; ?>
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="mail_type">Mail Type</label>
                                            <input type="text"
                                                class="form-control <?= !empty($error['mail_type']) ? 'is-invalid' : ''; ?>"
                                                name="mail_type" id="mail_type"
                                                value="<?= old('mail_type', $email['mail_type']); ?>">
                                            <small class="invalid-feedback">
                                                <?= !empty($error['mail_type']) ? validation_show_error('mail_type') : ''; ?>
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="charset">Charset</label>
                                            <input type="text"
                                                class="form-control <?= !empty($error['charset']) ? 'is-invalid' : ''; ?>"
                                                name="charset" id="charset"
                                                value="<?= old('charset', $email['charset']); ?>">
                                            <small class="invalid-feedback">
                                                <?= !empty($error['charset']) ? validation_show_error('charset') : ''; ?>
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="validate" class="form-label">Validate</label>
                                            <div class="btn-group btn-group-toggle btn-block" data-toggle="buttons">
                                                <label
                                                    class="btn btn-lg btn-outline-success w-50 <?= (old('validate', $email['validate']) == 1) ? "active" : ""; ?>">
                                                    <input type="radio" name="validate" value="1"
                                                        <?= (old('validate', $email['validate']) == 1) ? "checked active" : ""; ?>>
                                                    Aktif
                                                </label>
                                                <label
                                                    class="btn btn-lg btn-outline-danger w-50 <?= (old('validate', $email['validate']) == 0) ? "active" : ""; ?>">
                                                    <input type="radio" name="validate" value="0"
                                                        <?= (old('validate', $email['validate']) == 0) ? "active" : ""; ?>>
                                                    Tidak Aktif
                                                </label>
                                            </div>
                                            <small class="invalid-feedback">
                                                <?= !empty($rusak['validate']) ? validation_show_error('validate') : ''; ?>
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="priority">Priority</label>
                                            <input type="text"
                                                class="form-control <?= !empty($error['priority']) ? 'is-invalid' : ''; ?>"
                                                name="priority" id="priority"
                                                value="<?= old('priority', $email['priority']); ?>">
                                            <small class="invalid-feedback">
                                                <?= !empty($error['priority']) ? validation_show_error('priority') : ''; ?>
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="crlf">Crlf</label>
                                            <input type="text"
                                                class="form-control <?= !empty($error['crlf']) ? 'is-invalid' : ''; ?>"
                                                name="crlf" id="crlf" value="<?= old('crlf', $email['crlf']); ?>">
                                            <small class="invalid-feedback">
                                                <?= !empty($error['crlf']) ? validation_show_error('crlf') : ''; ?>
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="newline">New Line</label>
                                            <input type="text"
                                                class="form-control <?= !empty($error['newline']) ? 'is-invalid' : ''; ?>"
                                                name="newline" id="newline"
                                                value="<?= old('newline', $email['newline']); ?>">
                                            <small class="invalid-feedback">
                                                <?= !empty($error['newline']) ? validation_show_error('newline') : ''; ?>
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="bcc_batch_mode" class="form-label">Bcc Batch Mode</label>
                                            <div class="btn-group btn-group-toggle btn-block" data-toggle="buttons">
                                                <label
                                                    class="btn btn-lg btn-outline-success w-50 <?= (old('bcc_batch_mode', $email['bcc_batch_mode']) == 1) ? "active" : ""; ?>">
                                                    <input type="radio" name="bcc_batch_mode" value="1"
                                                        <?= (old('bcc_batch_mode', $email['bcc_batch_mode']) == 1) ? "checked active" : ""; ?>>
                                                    Aktif
                                                </label>
                                                <label
                                                    class="btn btn-lg btn-outline-danger w-50 <?= (old('bcc_batch_mode', $email['bcc_batch_mode']) == 0) ? "active" : ""; ?>">
                                                    <input type="radio" name="bcc_batch_mode" value="0"
                                                        <?= (old('bcc_batch_mode', $email['bcc_batch_mode']) == 0) ? "active" : ""; ?>>
                                                    Tidak Aktif
                                                </label>
                                            </div>
                                            <small class="invalid-feedback">
                                                <?= !empty($rusak['bcc_batch_mode']) ? validation_show_error('bcc_batch_mode') : ''; ?>
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="bcc_batch_size">Bcc Batch Size</label>
                                            <input type="text"
                                                class="form-control <?= !empty($error['bcc_batch_size']) ? 'is-invalid' : ''; ?>"
                                                name="bcc_batch_size" id="bcc_batch_size"
                                                value="<?= old('bcc_batch_size', $email['bcc_batch_size']); ?>">
                                            <small class="invalid-feedback">
                                                <?= !empty($error['bcc_batch_size']) ? validation_show_error('bcc_batch_size') : ''; ?>
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="dsn" class="form-label">Dsn</label>
                                            <div class="btn-group btn-group-toggle btn-block" data-toggle="buttons">
                                                <label
                                                    class="btn btn-lg btn-outline-success w-50 <?= (old('dsn', $email['dsn']) == 1) ? "active" : ""; ?>">
                                                    <input type="radio" name="dsn" value="1"
                                                        <?= (old('dsn', $email['dsn']) == 1) ? "checked active" : ""; ?>>
                                                    Aktif
                                                </label>
                                                <label
                                                    class="btn btn-lg btn-outline-danger w-50 <?= (old('dsn', $email['dsn']) == 0) ? "active" : ""; ?>">
                                                    <input type="radio" name="dsn" value="0"
                                                        <?= (old('dsn', $email['dsn']) == 0) ? "active" : ""; ?>>
                                                    Tidak Aktif
                                                </label>
                                            </div>
                                            <small class="invalid-feedback">
                                                <?= !empty($rusak['dsn']) ? validation_show_error('dsn') : ''; ?>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection('content') ?>