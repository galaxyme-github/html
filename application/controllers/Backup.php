<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Backup extends Authorization_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helpers('download');
        authorization(['superadmin'], true);
    }

    public function index()
    {
    $page_data['page_name'] = 'backup/index';
    $page_data['page_title'] = 'Database Management';

    $this->load->view('backend/index', $page_data);
    }

    /* create database backup */
    public function create()
    {
        $this->load->dbutil();
        $options = array(
        'format' => 'zip', // gzip, zip, txt
        'add_drop' => true, // Whether to add DROP TABLE statements to backup file
        'add_insert' => true, // Whether to add INSERT data to backup file
        'filename' => 'DB-backup_' . date('Y-m-d_H-i'),
    );

    $backup = $this->dbutil->backup($options);
    if (!write_file('./uploads/db_backup/DB-backup_' . date('Y-m-d_H-i') . '.zip', $backup)) {
        error('Database backup failed', site_url('backup'));
    } else {
        success('Database backup completed', site_url('backup'));
    }
    }

    /* Download Backup into your local machine */
    public function download()
    {
        $file = $this->input->get('file');
        $this->data = file_get_contents('./uploads/db_backup/' . $file);
        force_download($file, $this->data);
        redirect(base_url('backup'));
    }

    /* Delete Backup File from Storage */
    public function delete_file($file)
    {
        unlink('./uploads/db_backup/' . $file);
        redirect(base_url('backup'));
    }
}
