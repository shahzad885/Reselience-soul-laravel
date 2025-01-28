<?php

namespace App\Http\Controllers;



use App\Models\User; // Import the User model
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables; // Import Yajra DataTables

class AdminController extends Controller
{
   

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $users = User::query(); // Fetch users from the database
            return DataTables::of($users)
                ->addColumn('actions', function ($row) {
                    return '
                        <a href="' . route('user.edit', $row->id) . '" class="btn btn-sm btn-primary">Edit</a>
                        <form action="' . route('user.destroy', $row->id) . '" method="POST" style="display:inline-block;">
                            ' . csrf_field() . method_field('DELETE') . '
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm(\'Are you sure?\')">Delete</button>
                        </form>
                    ';
                })
                ->rawColumns(['actions']) // Enable raw HTML for actions
                ->make(true);
        }
    
        return view('Admin.AdminDashboard'); // Load the view for non-AJAX requests
    }
    
    /**
     * Show the form for editing the specified user.
     */
    public function edit($id)
    {
        // Find user by ID
        $user = User::findOrFail($id);
        
        // Pass user to the view
        return view('Admin.EditUser', compact('user'));
    }

    /**
     * Update the specified user in the database.
     */
    public function update(Request $request, $id)
    {
        // Validate incoming data
        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'userType' => 'required|string'
        ]);

        // Update user details
        $user = User::findOrFail($id);
        $user->update($validated);

        // Redirect with a success message
        return redirect()->route('AdminDashboard')->with('success', 'User details updated successfully.');
    }

    /**
     * Remove the specified user from the database.
     */
    public function destroy($id)
    {
        // Find and delete the user
        $user = User::findOrFail($id);
        $user->delete();

        // Redirect with a success message
        return redirect()->route('AdminDashboard')->with('success', 'User deleted successfully.');
    }

    public function exportUsers()
{
    // Fetch users from the database
    $users = \App\Models\User::all();

    // Define the file name
    $fileName = 'users.csv';

    // Create headers for the CSV file
    $headers = [
        'Content-Type' => 'text/csv',
        'Content-Disposition' => "attachment; filename=\"$fileName\"",
    ];

    // Create a callback to write CSV content
    $callback = function () use ($users) {
        $file = fopen('php://output', 'w');

        // Add column headers to the CSV file
        fputcsv($file, ['ID', 'Username', 'Email', 'User Type']);

        // Add rows of user data
        foreach ($users as $user) {
            fputcsv($file, [$user->id, $user->username, $user->email, $user->userType]);
        }

        fclose($file);
    };

    // Return the CSV as a response
    return response()->stream($callback, 200, $headers);
}

}
